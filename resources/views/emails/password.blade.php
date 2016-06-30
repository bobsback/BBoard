<!-- resources/views/emails/password.blade.php -->

<style>
    html, body {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        color: #000011;
        display: table;
        font-weight: 100;
        font-family: 'Roboto';
    }
    p{
        color: #000011;
    }

    .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }

    .content {
        text-align: center;
        display: inline-block;
    }

    .title {
        font-size: 20px;
        margin-bottom: 40px;
    }
</style>
<p>
    Dang, forgot your password? No problem click the link below to reset:
Click here to reset your password: {{ url('password/reset/'.$token) }}
</p>