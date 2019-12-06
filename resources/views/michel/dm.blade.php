@extends('layouts.michel')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/dm.css') }}">
@endsection
@section('title',"DM")
@section('content')

<script>
$(document).ready(function(){
    window.scroll(0,$(document).height());
});
</script>

    <!-- <div class="wrap">　こいつがあればヘッダー画像が画面幅からはみ出さない。けどヘッダー固定できなくなる -->
    
    <!-- 企画のサムネイル -->
    <header class="sticky-top">
        <div class=" header-image">
            <!-- 企画者のアイコン -->
            <div class="title text-center tbl">
                <div class="text-middle">{{$name}}</div>
                <div class="text-small">{{$title}}</div>
            </div>
        </div>
    </header>
    <div id="app">
        <chats></chats>

        {{-- Vue.js --}}
        {{-- <div class="container-fluid px-0">
            <div class="line-bc mb-5" id="auto_scroll" style="overflow:auto;word-wrap: break-word;overflow-wrap: break-word;">
                <div v-for="m in messages">
                    
                    <div class="mycomment" v-if="m.human === 0">
                        <span class="time-m" v-text="moment(m.datetime).format('H:mm')"></span>
                        <p v-text="m.message"></p>
                    </div>

                    <div class="partner" v-else>
                        <div class="faceicon">
                            <img class="border border-dark" width="45" height="45" src="{{$img}}">
                        </div>
                        <div class="chatting">
                            <div class="says" v-text="m.message"></div>
                            <span class="time-p" v-text="moment(m.datetime).format('H:mm')"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- Laravel --}}
        {{-- <!-- 自分の言葉（→から出てくる） -->
        <div class="container-fluid px-0">
            <!--①LINE会話全体を囲う-->
            <div class="line-bc mb-5" id="auto_scroll" style="overflow:auto;word-wrap: break-word;overflow-wrap: break-word;">
                @foreach ($mergeMessage as $msg)
                    @if ($msg['human']==0)
                        <div class="mycomment">
                            <span class="time-m">{{ date('H:i',strtotime($msg['datetime'])) }}</span>
                            <p>{!! nl2br(e($msg['message'])) !!}</p>
                        </div>  
                    @else
                        <div class="partner">
                            <div class="faceicon">
                                <img class="border border-dark" width="45" height="45" src="{{$img}}">
                            </div>
                            <div class="chatting">
                                <div class="says"><p>{!! nl2br(e($msg['message'])) !!}</p></div>
                                <span class="time-p">{{ date('H:i',strtotime($msg['datetime'])) }}</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div><!--/①LINE会話終了-->
        </div> --}}

        {{-- <div class="container-fluid js-auto-scroll">
            <div class="row">
                <div class="send fixed-bottom bg-ao pt-1 pb-1" style="text-align: center;"> --}}
                        
                    {{-- Laravel初め --}}

                    {{-- <form method="post" action="./dmSubmit" enctype="multipart/form-data" style="display:inline"> --}}
                            {{-- {{ csrf_field() }} --}}

                    {{-- Laravel終わり --}}

                                {{-- <textarea maxlength="128" style="vertical-align:top;width:40%;" placeholder="メッセージを入力" name="message" rows="1" class="text-area send-message border-dark rounded col-xs-4" v-model="message"></textarea>
                                <button id="sub" type="button" @click="send()" class="justify-content-center border ml-1 col-xs-4 rounded btn-flat-simple" style="vertical-align: top;">送信</button> --}}
                                
                                {{-- Laravel初め --}}
                                
                                {{-- <input type="submit" class="justify-content-center border ml-1 col-xs-4 rounded btn-flat-simple" style="vertical-align: top;" value="送信"> --}}
                        {{-- </form> --}}

                                {{-- Laravel終わり --}}

                        
                        {{-- @if ($flg)
                        
                            <form method="post" action="./assessment" style="display: inline">
                                {{ csrf_field() }}
                                <input type="submit" class="ml-1 mr-2 border col-xs-4 rounded btn-flat-simple" style="vertical-align: top;　font-size:10px;" value="企画を終了">
                            </form>
                        
                        @endif
                </div>
            </div>
        </div> --}}
    </div>

    <script>
        // setTimeout(function() {
        //     window.scrollTo(0,document.body.scrollHeight);
        // },0);
    </script>

    <script>
        $(function(){
            $('[type="submit"]').click(function(){
                $(this).prop('disabled',true);//ボタンを無効化する
                $(this).closest('form').submit();//フォームを送信する
            });
        });
    </script>
    
    <script src="js/app.js"></script>
    
    {{-- <script type="text/javascript">
    //vue
    
        new Vue({
            el: '#chat',
            data: {
                message: '',
                messages: []
            },
            methods: {
                send() {
                    const url = 'dmSubmit';
                    const params = { message: this.message };
                    axios.post(url, params)
                        .then((response) => {
                            // 成功したらメッセージをクリア
                            this.message = '';
                        });
                },
                getMessages() {
                    const url = 'dmGet';
                    axios.get(url)
                        .then((response) => {
                            this.messages = response.data;
                        });
                },
            },
            mounted() {

                this.getMessages();
                Echo.join('chat')
                .listen('.server.created', (event) => {
                    alert("a");
                    this.getMessages(); // 全メッセージを再読込

                });
            }
        });
        
    </script> --}}
    
@endsection