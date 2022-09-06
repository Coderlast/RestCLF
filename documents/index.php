<html>
<head>
    <style>
        body {
            background-color: #ffffff;
        }

        .container {
            page-break-before: always;
        }
        .container:first-of-type {
            page-break-before: auto;
        }

        .pdf {
            margin: 25px;
        }

        .pdf h2 {
            text-align: center;
            color: #053447;
        }

        .detail {
            width: 100%;
            border-collapse: collapse;
        }

        .detail td {
            border: 1px solid black;
            padding: 2px 10px;
            line-height: 25px;
        }

        .detail .width-50 {
            width: 50%;
        }

        .detail .width-25 {
            width: 25%;
        }

        .pdf-price {
            width: 100%;
            border-collapse: collapse;
        }

        .pdf-price .width-5 {
            width: 5%;
        }

        .pdf-price .width-10 {
            width: 10%;
        }

        .pdf-price .width-20 {
            width: 20%;
        }

        .pdf-price .width-25 {
            width: 25%;
        }

        .pdf-price .width-45 {
            width: 45%;
        }

        .pdf-price th {
            color: #ffffff  ;
            background-color: #053447;
        }

        .pdf-price tr:nth-child(1) {
            height: 35px;
        }

        .pdf-price th {
            border: 1px solid black;
            border-top: none;
        }

        .pdf-price .pdf-price-details td {
            border: 1px solid black;
            border-top: none;
            border-bottom: none;
            padding: 2px 10px;
            text-align: right;
        }

        .pdf-price td {
            border: 1px solid black;
            padding: 2px 10px;
            text-align: right;
            line-height: 25px;
        }

        .pdf-price .pdf-price-last {
            height: 35px;
        }

        .pdf-price .pdf-price-last td {
            border: 1px solid black;
            padding: 2px 10px;
            text-align: right;
        }

        .pdf-price .pdf-price-details .text-left {
            text-align: left;
        }

        .pdf-price .text-left {
            text-align: left;
        }

        .container .fullImage{
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="fullImage">
            <img src="masterplan.jpg" alt="" width="100%">
        </div>
    </div>
    <div class='container pdf'>
            <h2>Payment Plan</h2>
            <table class='detail'>
                <tr>
                    <td rowspan='4' class='width-50'>
                        Project:
                        <strong>
                            Name
                        </strong>
                    </td>
                    <td class='width-25'>
                        Master Community:<br><strong>TAG</strong>
                    </td>
                    <td class='width-25'>
                        Villa:<br><strong>TAG (VillaNumber)</strong>
                    </td>
                </tr>
                <tr>
                    <td class='width-25'>
                        Plot area:<br><strong>4250</strong>
                    </td>
                    <td class='width-25'>
                        BUA:<br><strong>4250</strong>
                    </td>
                </tr>
                <tr>
                    <td class='width-25'>
                        Selling Price <br><strong>4,350,888</strong>
                    </td>
                    <td class='width-25'>
                        Transfer fee 4%<br><strong>174,036</strong>
                    </td>
                </tr>
                <tr>
                    <td class='width-25'>
                        BNOC fee (AED)<br><strong>5,250</strong>
                    </td>
                    <td class='width-25'>
                        Agency fee 2% + VAT <br><strong>91,369</strong>
                    </td>
                </tr>
            </table>
            <h3>Payment Schedule</h3>
            <table class='pdf-price'>
                <tr>
                    <th class='width-5'>#</th>
                    <th class='width-45'>Date</th>
                    <th class='width-10'>Procent</th>
                    <th class='width-10'>Price</th>
                </tr>
                <tr class='pdf-price-details'>
                    <td>1</td>
                    <td class='text-left'>01.03.2023</td>
                    <td>5%</td>
                    <td>1</td>
                </tr>
                <tr class='pdf-price'>
                    <td>2</td>
                    <td class='text-left'>01.03.2023</td>
                    <td>5%</td>
                    <td>1</td>
                </tr>
                <tr class='pdf-price'>
                    <td>3</td>
                    <td class='text-left'>01.03.2023</td>
                    <td>5%</td>
                    <td>1</td>
                </tr>
                <tr class='pdf-price'>
                    <td>4</td>
                    <td class='text-left'>01.03.2023</td>
                    <td>5%</td>
                    <td>1</td>
                </tr>
                <tr class='pdf-price-last'>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td><strong></strong></td>
                    <td><strong>1</strong></td>
                </tr>
                <tr>
                    <td colspan='6' class='text-left'>
                        info
                        <br>
                    </td>
                </tr>
            </table>
            <div style='float:left;margin-top:20px;'>
                <strong>
                    Declaration<br>
                    info
                </strong>
            </div>
            <div style='float:right;margin-top:55px;'>
                <strong>Realtor Of dubai</strong>
            </div>
        </div>
    <div class="container">
        <div class="fullImage">
            <img src="masterplan.jpg" alt="" width="100%">
        </div>
    </div>
    <div class="container">
        <div class="fullImage">
            <img src="floorplan.jpg" alt="" width="100%">
        </div>
    </div>
    <div class="container">
        <div class="fullImage">
            <img src="about.jpg" alt="" width="100%">
        </div>
    </div>
</body>

</html>