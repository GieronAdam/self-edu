jQuery(document).ready(function($){

    var pinLogic = function() {
        console.log('pin logic');
        var button = $('.expanders__relay');
        button.each(function(){
            if ($(this).attr('audio') == '.mp3'){
                $(this).css('display','none');
            } else {
                $(this).css('display','block');
            }
        });

        function setButtons(){
            button.each(function(){
                $(this).on('click',function(){
                    if($(this).attr('pin') == '1'){
                        $(this).removeClass('on');
                    } else {
                        $(this).addClass('on');
                    }
                });
            });
        }

        function getObject()
        {

            return $('.expanders > li > a');
        }

        function pins(obj)
        {
            getObject().each(function(index){
                $(this).on('click',function(){
                    var id = $(this).attr('relayId')
                    text = $(this).next().val()
                    content = $('#custom-text');
                    content.css('height','0');
                    // content.html('');
                    // content.html(text);
                    $(this).attr('pin', function(index, attr){
                        return attr == 1 ? 0 : 1;
                    });
                    var expander = [],
                        pointData = [],
                        command = $(this).attr('expander');
                    command2 = getObject().each(function(){
                        if(command == $(this).attr('expander')) {
                            expander.push($(this).attr('pin'));
                        }
                    });
                    var stringPin = expander.join('');

                    stringProcessPin = stringPin.replace(',','');
                    pointData[0] = command + stringProcessPin;
                    pointData[1] = $(this).attr('audio');
                    pointData[2] = 'status' + $(this).attr('pin');

                    if ($(this).attr('external') == 'true'){
                        console.log('external ajax');
                        $.ajax({
                            type: "GET",
                            url : "raspberry/externalrequest",
                            data : { data: pointData },
                            success : function(response){
                                console.log(response);
                                $.ajax({
                                    type: "POST",
                                    url : "raspberry/request",
                                    data : { data: pointData },
                                    success : function(response){
                                        console.log(response)
                                        console.log(pointData)
                                    },error:function(resp) {
                                        console.log(resp)
                                    }
                                },"json");
                            },error:function(resp){
                                console.log(resp)
                            }
                        },"json");

                    } else {
                        console.log('internal ajax');
                        $.ajax({
                            type: "POST",
                            url : "raspberry/request",
                            data : { data: pointData },
                            success : function(response){
                                console.log(pointData)
                            },error:function(resp) {
                                console.log(resp)
                            }
                        },"json");
                    }


                });
            });
            setButtons();
        } pins();
        //returns
        return {
            setButtons: setButtons,
            pins: pins
        }
    }();

    var switchall = function(){
        var switchAllOn = $('#switchAllOn'),
            switchAllOff = $('#switchAllOff');
        console.log(switchAllOff);
        switchAllOn.on('click',function(){
            switchAllOff.removeClass('on');

            $.ajax({
                type: "POST",
                url : "switchAllOn",
                data : { data: 'on' },
                success : function(response){
                    console.log(response);
                }, error: function(response)
                {
                    console.log(response);
                }
            },"json");

        });
        switchAllOff.on('click',function(){
            switchAllOn.removeClass('on');
            console.log(switchAllOn);
            $.ajax({
                type: "POST",
                url : "switchAllOff",
                data : { data: 'off' },
                success : function(response){
                    console.log(response);
                }, error: function(response)
                {
                    console.log(response);
                }
            },"json");
        });

    }();

    var setText = function() {
        var text = $(this).next().val(),
            content = $('#custom-text');
        button = $();

    }();
});
