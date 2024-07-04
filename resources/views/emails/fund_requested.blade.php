<!DOCTYPE html>
<html>

<head>
    <title>Payment Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
            direction: rtl;
            /* Ensure text aligns right for Arabic */
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .content {
            font-size: 16px;
            line-height: 1.5;
        }

        .amount {
            font-size: 32px;
            font-weight: bold;
            color: #333333;
            margin: 20px 0;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #8b4513;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin: 20px 0;
            display: block;
        }

        .footer {
            font-size: 14px;
            color: #999999;
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    @php
        $client = $case->client;
    @endphp
    <div class="container" style="margin-top: 5px;">
        <div class="header">Payment Request</div>
        <div class="content">
            <p>السيد {{ $client->full_name }} المحترم،</p>
            <p>تم طلب ادناه لإكمال السير في قضية {{ $case->title }} الخاصة بك.</p>
            @if ($pay_method == 'wire')
                <p>الرجاء ايداع المبلغ في بنك {{ $bank }} في حساب رقم {{ $bank_account }}.</p>
            @else
                <p>الرجاء احضار المبلغ نقدياً.</p>
            @endif
            <p>علماً ان تاريخ استحقاق هذا المبلغ هو {{ $fund->due_date }}.</p>
            <div class="amount">${{ $fund->requested_amount }}</div>
            <a href="#" class="button">إيداع الأموال</a>
            <p style="margin-top: 5px;">{{ $fund->message }}</p>
        </div>
        <div class="footer">
            <p>شكراً،</p>
            <p>مكتب عادل للمحاماة</p>
            <p>هذا إشعار تلقائي. لحماية سرية هذه الاتصالات، يرجى عدم الرد على هذا البريد الإلكتروني.</p>
            <p>تم إرسال هذا البريد الإلكتروني إليك بواسطة <b>مكتب عادل للمحاماة</b></p>
        </div>
    </div>
</body>

</html>
