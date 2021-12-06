<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Loans;
use App\Models\LoanRepayments;
use Validator;
use App\Http\Resources\Loans as LoansResource;

class LoanController extends BaseController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'loan_amount' => 'required|numeric|min:1',
            'loan_term' => 'required|numeric|min:1'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input['user_id'] = auth()->user()->id;
        $input['status'] = 1;
        $input['approval_status'] = 1;
        $input['modified_by'] = 0;
        $loan = Loans::create($input);

        return $this->sendResponse(new LoansResource($loan), 'Loan request has been sent successfully.');
    }

    /**
     *  Store loan repayment
     *
     *  @param \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */

    public function postLoanRepayment(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'loan_id' => 'required|integer',
            'repay_amount' => 'required|numeric|min:1'
        ]);

        $loandInfo = Loans::findOrFail($request->loan_id);
        $repayAmt = ($loandInfo->loan_amount / $loandInfo->loan_term);
        if($repayAmt != $request->repay_amount) {
            return $this->sendError('Repayment Warning.', 'Your repayment amount doesn\'t match with approved repayment amount ('.$repayAmt.').');
        }

        $repay = new LoanRepayments;
        $repay->loan_id = $request->loan_id;
        $repay->amount = $request->repay_amount;
        $repay->save();

        return $this->sendResponse('Repayment Success.', 'Your payment has been successfully received.');
    }
}
