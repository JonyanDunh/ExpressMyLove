
<view qq:for='{{json}}' style='padding: 10px 10px 10px 10px;'>
<view style='background-color:rgba(255, 255, 255, 0.5);border-radius:5px;padding: 10px 10px 10px 10px;border:1px solid 	#DCDCDC;overflow: hidden;'>
<text style='display: block;
    font-size: 1.5em;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
color: #7B68EE;'>{{item.to}}\n</text>
<text style="color:	#008B8B;display: block;
    font-size: 1.17em;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;">「{{item.content}}」\n</text>
<view style="
    background-color:rgba(255,250,205, 0.5);
    border-radius:5px;
    vertical-align:middle;
    float:right;
    position:relative;">
<text style="color:#FF6347;">—— {{item.from}}</text>
</view>
  </view>
</view>

<view bindtap='write_letter'>
       <image class='add_icon' src='../image/情书.png' ></image >
</view>




