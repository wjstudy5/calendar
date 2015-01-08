<?php
    echo $this->Html->css('Meetings/create', array('inline' => false));
    echo $this->Html->script('Meetings/create', array('inline' => false));
?>

<div id ="link-area" class = "link-area">
    <div id = "link-address-area" class = "link-address-area">
       <h5>Link</h5>
       <h6><a href="http://www.naver.com">www.naver.com</a></h6>
    </div>
    <h4>위의 링크를 복사해 다른 사람들과 이 일정페이지를 공유하세요.</h4>
    <button class ="button btn">클립보드에 복사</button>
</div>

<div>
    <div id = "ordinary-button-area" class = "ordinary-button-area">
        <a href="http://www.naver.com"><div class = "div-button-default btn">일정 입력하기</div></a>
        <a href=""><div class = "div-button-default btn">메인 화면으로 가기</div></a>
    </div>
    <div id = "share-button-area" class ="share-button-area">
        <div>페이스북으로 공유하기</div>
    </div>
</div>



