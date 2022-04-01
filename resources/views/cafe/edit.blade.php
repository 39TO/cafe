<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cafe_cafe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/db.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(function(){
            $(".first_form").submit(function(){
                if(!confirm('本当に編集しますか？')){
                    return false;
                }
            });
        });
        $(function(){
            $(".first_form").submit(function(){
    
                //エラーの初期化
                $("p.error").remove();
                $("dl dd").removeClass("error");
        
                $(":text,textarea").each(function(){
            
                    //必須項目のチェック
                    $(this).filter(".required").each(function(){
                        if($(this).val()==""){
                        $(this).parent().prepend("<p class='error'>必須項目です</p>");
                        }
                    });

                    $(this).filter(".max").each(function(){
                        if(!($(this).val()=="")){
                            if($(this).val().length > 10){
                                $(this).parent().prepend("<p class='error'>10字以内で入力してください</p>");
                            }
                        }   
                    });
                    //数値のチェック
                    $(this).filter(".number").each(function(){
                        if(isNaN($(this).val())){
                            $(this).parent().prepend("<p class='error'>数値のみ入力可能です</p>");
                        }
                    });
            
                    //メールアドレスのチェック
                    $(this).filter(".mail").each(function(){
                        if($(this).val() && !$(this).val().match(/.+@.+/)){
                        $(this).parent().prepend("<p class='error'>正しくメールアドレスを入力してください</p>");
                        }   
                    });
                });
                
                if($(".error").length > 0){
                    $('html,body').animate({ scrollTop: $("p.error:first").offset().top-40 }, 'slow');
                    $("p.error").parent().addClass("error");
                    return false;
                }
            });
        });
    </script>
    <title>編集画面</title>
</head>
<body>
    <header class="contact">
        <nav class="motion">
       
		@include('header')
	    
        </nav>
    </header>
    
    <section>
        <div class="contact_box">
            <h2>編集</h2>
			<form class="first_form" action="{{ url('/update/$contact->id') }}" method="POST">
                @csrf
                <h3>下記の項目をご記入の上編集ボタンを押してください</h3>
                
                <p><span class="red">*</span>は必須項目となります。</p>
                <input type="hidden" name="id" value="{{ $contact->id }}">
                <dl>
                    <dt><label for="name">氏名</label><span class="red">*</span></dt>
                    <dd><input type="text" name="name" id="name" class="required max" value="{{ $contact->name }}">
                    @if ($errors->has('name'))
                    <p class="error-message">{{ $errors->first('name') }}</p>
                    @endif
                    </dd>

                    <dt><label for="kana">フリガナ</label><span class="red">*</span></dt>
                    <dd><input type="text" name="kana" id="kana" class="required max" value="{{ $contact->kana }}">
                    @if ($errors->has('kana'))
                    <p class="error-message">{{ $errors->first('kana') }}</p>
                    @endif
                    </dd>

                    <dt><label for="tel">電話番号</label></dt>       
                    <dd><input type="text" name="tel" id="tel" class="number" value="{{ $contact->tel }}">
                    @if ($errors->has('tel'))
                    <p class="error-message">{{ $errors->first('tel') }}</p>
                    @endif
                    </dd>

                    <dt><label for="email">メールアドレス</label><span class="red">*</span></dt>
                    <dd><input type="text" name="email" id="email" class="required mail" value="{{ $contact->email }}">
                    @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                    @endif
                    </dd>
                </dl>

            <h3><label for="body">お問い合わせ内容をご記入ください<span class="red">*</span></label></h3>
            <dl class="body">
               
                <dd><textarea name="body" id="body" class="required">{{ $contact->body }}</textarea>
                @if ($errors->has('body'))
                <p class="error-message">{{ $errors->first('body') }}</p>
                @endif
                </dd>


				<dd><button type="submit">編　集</button></dd>
			</dl>
			</form>
        </div>
    </section>

    
        
    

    <footer>
    @include('footer')
    </footer>
    
</body>
</html>