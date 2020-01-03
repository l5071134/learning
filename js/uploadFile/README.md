#jquery ajax上传文件

```
<input type="file" name="f" id="f" multiple>
var fd = new FormData();
fd.append("name", "bill");
fd.append("photo", $('#f')[0].files[0]);
fd.append("photo2", $('#f')[0].files[1]);
$.ajax({
    url: '/webform1.aspx',
    type: 'post',
    processData: false,
    contentType: false,
    data: fd,
    success: function () {
        alert("ok")
    }
})
```
> 注 processData、contentType必须为false
