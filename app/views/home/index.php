<!DOCTYPE html>
<!-- saved from url=(0024)http://localhost/ka/pos/ -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>立刷免费领取 - 7*24小时极速到帐</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php echo css('main.css') ?>
    
</head>

<body>
    <div class="container">
        <div class="home">
            <div class="img"><img src="<?php echo image('1.jpg') ?>" alt=""></div>
            <div class="img"><img src="<?php echo image('2.jpg') ?>" alt=""></div>
            <div class="img"><img src="<?php echo image('3.jpg') ?>" alt=""></div>
            <div class="form">
                <div class="content">
                    <form id="form_contenct">
                        <div class="entry">
                            <label>请输入您的姓名<span>*</span></label>
                            <input type="text" id="username" name="username" placeholder="">
                        </div>
                        <div class="entry">
                            <label>请输入您的电话<span>*</span></label>
                            <input type="text" id="phone" name="phone" placeholder="">
                        </div>
                        <div class="entry">
                            <label>请输入您区域<span>*</span></label>
                            <select id="province" name="province_id" onchange="province_change(this)">
                                <?php foreach ($province_list as $id => $province): ?>
                                <option value="<?php echo $province['id']?>"><?php echo $province['province_name'] ?></option>  
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="entry">
                            <select id="city_id" name="city_id">
                            </select>
                        </div>
                        <input type="hidden" name="c" value="<?php echo $c ?>">
                    </form>
                    <a class="btn" href="javascript:;" onclick="submit_contect()" id="submit_contect">免费领取</a>
                </div>
            </div>
            <div class="img"><img src="<?php echo image('4.jpg') ?>" alt=""></div>
            <footer>
                <p></p>
            </footer>


            <div class="bottom">
                <ul>
                    <li>
                        <a href="tel:400-863-7198">加盟电话</a>
                    </li>
                    <li>
                        <a href="tel:13626807198">咨询电话</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php echo js('jquery.min.js') ?>
    <script>
        function submit_contect() {
            $.ajax({
                url: '<?php echo base_url('index/submitContect') ?>',
                type: 'POST',
                dataType: 'json',
                data: $('#form_contenct').serialize(),
                success:function(data) {
                    if(data.status == 200) {
                        alert('申请成功');
                        location.reload();
                    }else {
                        alert(data.msg);
                    }
                }
            })
        }

        function province_change(it) {
            $(it).val();
            $.post('<?php echo base_url('index/get_city')?>', {province_id: $(it).val()}, function(data) {
                var html = '';
                for(x in data.msg) {
                    html += '<option value="'+data.msg[x]['id']+'">'+data.msg[x]['city_name']+'</option>'
                }
                $("#city_id").html(html);
            }, 'JSON');
        }
    </script>
</body>
</html>