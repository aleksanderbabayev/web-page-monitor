<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Web Page Monitor</title>
    <style>
        body {}
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th {
            text-align: center;
            padding: 5px;
            border: 1px solid black;
            font-weight: bold;
        }
        td {
            padding: 5px;
            border: 1px solid black;
        }
        td.link {
            text-align: center;
        }
        td.number {
            text-align: right;
        }
    </style>
    @yield('style')
</head>
<body>
    @yield('content')
</body>
</html>
