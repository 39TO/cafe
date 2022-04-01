<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/cafe_cafe.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>完了画面</title>
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
          
            <div class="complete_msg">
                <p>お問い合わせ頂きありがとうございます。</p>
                <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                <a href="{{ route('top') }}">トップへ戻る</a>
            </div>
        </div>
    </section>

  <footer>
  @include('footer')
  </footer>
</body>
</html>