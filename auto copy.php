<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

<link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1000px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .container h2 {
        margin: 20px 0;
    }

    .form-control {
        width: 50%;
        margin-bottom: 20px;
    }

    .txt {
        width: 100%;
        background: #f2f2f2;
        outline: none;
        border: none;
        padding: 10px;
        border-radius: 10px;
        font-size: 1rem;
    }
</style>
<div class="container">
    <h2>Thailand.js</h2>
    <div class="form-control">
        <span>ตำบล/แขวง</span>
        <input id="district" type="text" class="txt" placeholder="ตำบล">
    </div>
    <div class="form-control">
        <span>อำเภอ/เขต</span>
        <input id="amphoe" type="text" class="txt" placeholder="อำเภอ">
    </div>
    <div class="form-control">
        <span>จังหวัด</span>
        <input id="province" type="text" class="txt" placeholder="จังหวัด">
    </div>
    <div class="form-control">
        <span>รหัสไปรษณีย์</span>
        <input id="zipcode" type="text" class="txt" placeholder="รหัสไปรษณีย์">
    </div>
</div>
<script>
    $.Thailand({
        $district: $("#district"), // input ของตำบล
        $amphoe: $("#amphoe"), // input ของอำเภอ
        $province: $("#province"), // input ของจังหวัด
        $zipcode: $("#zipcode") // input ของรหัสไปรษณีย์
    });
</script>