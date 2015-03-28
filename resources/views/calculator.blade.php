<!DOCTYPE html>
<html>
<head>
    <title>Online Moving Average Calculator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
</head>
<body>
<div align="center" class="container">
<h1>Moving Average Calculator</h1>
<br>
    <div class="row">
    {!! Form::open() !!}
        {!! Form::label('values', 'Values') !!}
        {!! Form::textarea('values', null, ['class' => 'span4', 'rows' => '20']) !!}
        <br>
        {!! Form::label('interval', 'Interval') !!}
        Do not change
        {!! Form::text('interval', '7', ['class' => 'span1']) !!}
        <br>
        {!! Form::submit('Calculate', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
        </div>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>