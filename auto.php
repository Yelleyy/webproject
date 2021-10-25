<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

    <link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Auto Province JS</title>
</head>

<div>
    <select id="amphoe" id="sub_district">
        <option>- กรุณาเลือกอำเภอ -</option>
    </select>
</div>
<div>
    <select id="district">
        <option>- กรุณาเลือกตำบล -</option>
    </select>
</div>
<div>
    <select id="province">
        <option>- กรุณาเลือกจังหวัด -</option>
    </select>
</div>
<div>
    <select id="zipcode">
        <option>- กรุณาเลือกเลขไปรษนี -</option>
    </select>
</div>

<body>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="AutoProvince.js"></script> -->
    <script>
    $.Thailand({
        $district: $("#district"), // input ของตำบล
        $amphoe: $("#amphoe"), // input ของอำเภอ
        $province: $("#province"), // input ของจังหวัด
        $zipcode: $("#zipcode") // input ของรหัสไปรษณีย์
    });
</script>
</body>

</html>