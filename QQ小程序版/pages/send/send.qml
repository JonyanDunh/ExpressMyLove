<view bindtap='love_list'>
       <image class='add_icon' src='../image/情书列表.png' ></image >
</view>
<view style='padding: 100px 10px 10px 10px;'>
<view style='padding: 10px 10px 10px 10px;'><input class="input" name="name" placeholder="你的名称" bindinput="nameInput"/></view>
<view style='padding: 10px 10px 10px 10px;'><input class="input" name="osname" placeholder="TA的名称" bindinput="osnameInput"/></view>
<view style='padding: 10px 10px 10px 10px;'><textarea class="textarea" name="content" placeholder="你想对TA说的话" bindinput="content"/></view>
<view style='padding: 10px 10px 10px 10px;text-align: center;'bindtap='send' ><button open-type="getUserInfo"><image class='send' src='../image/发送.png' ></image ></button></view>
</view>
