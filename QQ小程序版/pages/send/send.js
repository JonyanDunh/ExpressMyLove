Page({
love_list:function()
{
  qq.navigateTo({
      url: '/pages/index/index',
    })
},
send:function()
{
qq.getSetting({
  success(res) {
    if (res.authSetting['scope.userInfo']) {
        qq.getUserInfo({
            success(res) {
              qq.login({
  success(res) {
    if (res.code) {
      // 发起网络请求
console.log(res.code)
    } else {
      console.log('登录失败！' + res.errMsg)
    }
  }
})
            }
          })
    }
  }
})
}       

  
})