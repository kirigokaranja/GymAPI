<?php
/**
 * Created by PhpStorm.
 * User: kirigo karanja
 * Date: 03/07/2018
 * Time: 22:14
 */
?>
<html>
<head>
    <title>Instructor Information</title>
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
        <th>Instructor Id</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Image</th>
        <th>Gender</th>
        <th>Bio</th>
    </tr>
    @foreach ($fees as $fee)
        <tr>
            <td>{{$fee->id}}</td>
            <td>{{$fee->name}}</td>
            <td>{{$fee->contact}}</td>
            <td>{{$fee->email}}</td>
            <td>{{$fee->image}}</td>
            <td>{{$fee->gender}}</td>
            <td>{{$fee->bio}}</td>

            {{--<td>{{$student->firstName}}</td>--}}
        </tr>
    @endforeach

</table>
</body>
</html>
