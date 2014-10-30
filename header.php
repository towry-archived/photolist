<!DOCTYPE html>
<html>
<head>
    <title>My Photos</title>
    <style type="text/css">
    body {
        font: 13px/1.5 helvetica, arial, sans-serif;
        width: 800px;
        margin: 2em auto;
    }
    #photolist {
        list-style: none;
        overflow: hidden;
    }
    #photolist li {
        float: left;
        width: 200px;
        height: 200px;
        display: block;
        margin: .8em;
        position: relative;
    }
    li .delete {
        position: absolute;
        top: 2px;
        right: 2px;
        text-decoration: none;
        color: red;
        opacity: .8;
        display: block;
        width: 20px;
        height: 20px;
        background: rgba(0, 0, 0, .5);
        text-align: center;
    }
    #photolist li img {
        width: 100%;
        height: auto;
    }

    li img:hover {
        opacity: .8;
        cursor: pointer;
    }
    </style>
</head>
<body>
<h3><a href="/photolist">&larr;</a></h3>
