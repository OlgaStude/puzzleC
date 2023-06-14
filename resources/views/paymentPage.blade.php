<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('style/payment.css') }}" rel="stylesheet">
    @error('card')
        <style>
            #card{
                border: 2px solid #E85F5F;
            }
        </style>
    @enderror
    @error('cvc')
        <style>
            #cvc{
                border: 2px solid #E85F5F;
            }
        </style>
    @enderror
    @error('name')
        <style>
            #name{
                border: 2px solid #E85F5F;
            }
        </style>
    @enderror
    @error('year')
        <style>
            #year{
                border: 2px solid #E85F5F;
            }
        </style>
    @enderror
    @error('month')
        <style>
            #month{
                border: 2px solid #E85F5F;
            }
        </style>
    @enderror
    <title>Document</title>
</head>
<body>
@include('components.header')

    <form action="{{ route('operation') }}" method="get">
        <select name="" id="">
            <option value="">Сбербанк</option>
            <option value="">ГазПром Банк</option>
            <option value="">Российский Банк</option>
            <option value=""></option>
        </select>
        <div id="second_row">

            <input id="card" type="text" placeholder="Номер карты" name="card">
            <input id="month" type="text" placeholder="MM" name="month">
            <span id="slash">/</span>
            <input id="year" type="text" placeholder="YY" name="year">
            
        </div>
        <div id="last_row">
            <input id="name" type="text" placeholder="Имя на карте" name="name">
            <div id="text">
                <span>Три цифры на обороте</span>
            </div>
            <input id="cvc" type="text" placeholder="CVC" name="cvc">
        </div>
        <button type="submit">Оплатить</button>
    </form>
    @if(session('success_message') !== null)
    <p class="sucsess">{{ session('success_message') }}</p>
    {{ Session::forget('success_message') }}
    @endif
</div>

@include('components.footer')
    
</body>
</html>