var api = 'https://provinces.open-api.vn/api/?depth=3';

fetch(api)
    .then(function (response) {
        return response.json();
    })
    .then(function (posts) {
        console.log(posts);
        //province
        let html = '<option value="0">Chọn tỉnh thành</option>';
        for (let i = 0; i < posts.length; i++) {
            html += `<option value="${posts[i].code}">${posts[i].name}</option>`
        }
        $('#province').html(html);
        //districts
        $('#province').on('change', function () {
            let val = $('#province').val();//ma code
            let code;
            for (let i = 0; i < posts.length; i++) {
                if (posts[i].code == val)//so sanh ma code
                    code = i;//vi tri trong list   
            }
           
            let html1 = `<option value="0">Chọn Quận/Huyện</option>`;
            if (val != 0) {
                for (let i = 0; i < posts[code].districts.length; i++) {
                    html1 += `<option value="${posts[code].districts[i].code}">${posts[code].districts[i].name}</option>`
                }
            }
            $('#district').html(html1);
        })
        //ward
        $('#district').on('change', function(){
            let val1=$('#district').val();
            let code1;
            for(let i=0;i<posts.length;i++){
                if(posts[i].code1==val1)
                    code1=i;
            }
            console.log(posts.length)
            let html2=`<option value="0">Chọn Phường</option>`;
            if(val1!=0){
                for(let i=0;i<posts[code1].wards.length;i++){
                    html2+=`<option value="${posts[code1].wards[i].code}">${posts[code1].ward[i].name}</option>`
                }
            }
            $('#ward').html(html2);
        })
    })