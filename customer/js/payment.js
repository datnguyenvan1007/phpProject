var api = 'https://provinces.open-api.vn/api/?depth=3';

fetch(api)
    .then(function (response) {
        return response.json();
    })
    .then(function (posts) {
        console.log(posts);
        let html = '<option value="0">Chọn tỉnh thành</option>';
        for (let i = 0; i < posts.length; i++) {
            html += `<option value="${posts[i].code}">${posts[i].name}</option>`
        }
        $('#province').html(html);
        $('#province').on('change', function () {
            let val = $('#province').val();
            let code;
            for (let i = 0; i < posts.length; i++) {
                if (posts[i].code == val)
                    code = i;
            }
            let html1 = `<option value="0">Chọn Quận/Huyện</option>`;
            if (val != 0) {
                for (let i = 0; i < posts[code].districts.length; i++) {
                    html1 += `<option value="${posts[code].districts[i].code}">${posts[code].districts[i].name}</option>`
                }
            }
            $('#district').html(html1);
        })
    }) 