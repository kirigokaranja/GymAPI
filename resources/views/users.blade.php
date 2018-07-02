<?php
/**
 * Created by PhpStorm.
 * User: Shron
 * Date: 6/9/2018
 * Time: 11:16 AM
 */
?>
<html>
<head>
    <title>All Fee Information</title>
    <style>
        body {
            background: #000033;
            color: white;
            margin: 0;
        }
        table{
            margin-left: 20%;
            margin-top: 5%;
            border-collapse: collapse;
            width: 50%;
        }
        .topnav {
            overflow: hidden;
            background-color: #fab702;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 24px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: #000033;
        }

        .topnav a.active {
            background-color: #000033;
            color: white;
        }
        th {
            background-color: #fab702;
            color: white;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        h3{
            text-align: center;
            margin-top: 5%;
            font-size: 2.5em;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>User Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    @foreach ($fees as $fee)
        <tr>
            <td>{{$fee->id}}</td>
            <td>{{$fee->first_name}}</td>
            <td>{{$fee->last_name}}</td>
            <td>{{$fee->email}}</td>
            <td>{{$fee->password}}</td>

            {{--<td>{{$student->firstName}}</td>--}}
        </tr>
    @endforeach
    <h3>TOTAL: Ksh {{$total}}</h3>

</table>
</body>
</html>
