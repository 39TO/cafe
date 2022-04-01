<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;


class CafeController extends Controller
{
    //
    /**
     * cafe_cafeのトップページを表示
     * 
     * @return view
     */
    public function index(){
        return view('cafe.cafe_cafe');
    }

    /**
     * 問い合わせ入力ページを表示
     * 
     * @return view
     */
    public function contactForm(){
        $contacts = Contact::all();

        return view('cafe.contact',
        ['contacts' => $contacts]
    );
    }

    /**
     * 問い合わせ確認ページを表示
     * 
     * @return view
     */
    public function confirmForm(ContactRequest $request){
        
        $inputs = $request->all();
        
        return view('cafe.confirm', ['inputs' => $inputs]);
    }

    /**
     * 問い合わせ完了ページを表示、DBに格納
     * 
     * @return view
     */
    public function completeForm(ContactRequest $request){
        
        $inputs = $request->all();
        
        DB::beginTransaction();
        try{
            Contact::create($inputs);
            DB::commit();
        } catch(\Throwable $e) {
            DB::rollback();
        }

        return view('cafe.complete');
    }

    public function editForm($id){
        $contact = Contact::find($id);

        if(is_null($contact)) {
            return redirect(route('contact'));
        }

        return view('cafe.edit', ['contact' => $contact]);
    }

    public function updateForm(ContactRequest $request){

        $inputs = $request->all();

        DB::beginTransaction();
        try{
            $contact = Contact::find($inputs['id']);
            $contact->fill([
                'name' => $inputs['name'],
                'kana' => $inputs['kana'],
                'tel' => $inputs['tel'],
                'email' => $inputs['email'],
                'body' => $inputs['body'],
                
            ]);
            $contact->save();
            DB::commit();
        } catch(\Throwable $e) {
            DB::rollback();
        }

        return redirect(route('contact'));
    }
    
    public function deleteForm($id){

        DB::beginTransaction();
        try {
            Contact::destroy($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        
        return redirect(route('contact'));
    }



}
