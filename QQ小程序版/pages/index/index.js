// This is our App Service.
// This is our data.
// Register a Page.
Page({
onLoad: function () {
var that = this
qq.request({
url: 'https://www.deginx.com/love/server.php',
data: {
action:'Get_Love',
},
method: 'POST',
success: function(res){
that.setData({
json:res.data
})
}
})
},
write_letter:function()
{
  qq.navigateTo({
      url: '/pages/send/send',
    })
}    

  
})


