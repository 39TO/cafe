<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/cafe_cafe.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
</head>

<body>
    <header class="contact">
        <nav class="motion">
		@include('header')
        </nav>
    </header>
    <section>
        <div class="contact_box">
            <h2>お問い合わせ</h2>
			<form action="{{ route('complete') }}" method="post">
                @csrf

                <p>下記の内容をご確認の上送信ボタンを押してください</p>
                <p>内容を訂正する場合は戻るを押してください。</p>
			    <dl class="confirm">
                    <dt>氏名</dt>
                    <dd>
                        {{ $inputs['name'] }}
                        <input name="name" value="{{ $inputs['name'] }}" type="hidden">
                    </dd>
                    <dt>フリガナ</dt>
                    <dd>
                        {{ $inputs['kana'] }}
                        <input name="kana" value="{{ $inputs['kana'] }}" type="hidden">
                    </dd>
                    <dt>電話番号</dt>
                    <dd>
                        {{ $inputs['tel'] }}
                        <input name="tel" value="{{ $inputs['tel'] }}" type="hidden">
                    </dd>
                    <dt>メールアドレス</dt>
                    <dd>
                        {{ $inputs['email'] }}
                        <input name="email" value="{{ $inputs['email'] }}" type="hidden">
                    </dd>
                    <dt>お問い合わせ内容</dt>
                    <dd>
                    {!! nl2br(e($inputs['body'])) !!}
                        <input name="body" value="{{ $inputs['body'] }}" type="hidden">
                    </dd>
				    <dd class="confirm_btn">
                        <button type="submit">送　信</button>
                        <a href="javascript:history.back();">戻　る</a>
                    </dd>
                </dl>
            </form>
         
        </div>
       
    </section>
    
    <footer>
	@include('footer')
    </footer>

</body>
</html>