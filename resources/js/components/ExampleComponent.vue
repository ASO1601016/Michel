<template>
    <div ref="container">
        <div class="container-fluid px-0" id="sita">
            <div class="line-bc mb-5" id="auto_scroll" style="overflow:auto;word-wrap: break-word;overflow-wrap: break-word;">
                <div v-for="m in messages" :key = id>
                    <!-- メッセージ内容：自分側 -->
                    <div class="mycomment" v-if="m.human === 0">
                        <span class="time-m" v-text="m.datetime"></span>
                        <p class="brProcessing" v-text="m.message"></p>
                    </div>
                    <div class="partner" v-else>
                        <div class="faceicon">
                            <img class="border border-dark" width="45" height="45" :src="img">
                            
                        </div>
                        <div class="chatting">
                            <div class="says brProcessing" v-text="m.message"></div>
                            <span class="time-p" v-text="m.datetime"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid js-auto-scroll">
            <div class="row">
                <div class="send fixed-bottom bg-ao pt-2 pb-2 border-top" style="text-align: center;">
                    <textarea maxlength="128" style="vertical-align:top;width:40%;" placeholder="メッセージを入力" name="message" rows="1" class="text-area send-message border-dark rounded col-xs-4" v-model="message"></textarea>
                    
                    <button id="sub" type="button" :disabled="processing" @click="send()" class="justify-content-center border ml-1 col-xs-4 rounded btn-flat-simple" style="vertical-align: top;">送信</button>
                    <!-- @if ($flg) -->
                        <form v-if="flg" method="get" action="./assessment" style="display: inline">
                            <!-- {{ csrf_field() }} -->
                            <button type="submit"  class="justify-content-center border ml-1 col-xs-4 rounded btn-flat-simple" style="vertical-align: top;">企画を終了</button>
                        </form>
                        
                    <!-- @endif -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    
    export default {
        

        props:['flg','processing','img','messages','message'],
        
        // data: {
        //     message: '',
        //     messages: []
        // },
        updated() {
            this.scrollToEnd();
        },

        methods: {
            send() {
                this.startProcessing();
                const url = 'dmSubmit';
                const params = { message: this.message };
                axios.post(url, params)
                    .then((response) => {
                        // 成功したらメッセージをクリア
                        this.message = '';
                    });
                setTimeout(function () {
                    // ボタンのロックを解除する
                    this.endProcessing();
                }.bind(this), 1000)
            },
            sendAssessment() {
                const url = 'assessment';
                axios.post(url);
            },
            flgGet() {
                const url = 'flgGet';
                axios.get(url)
                    .then((response) => {
                        this.flg = response.data;
                    });
            },
            imgGet() {
                const url = 'imgGet';
                axios.get(url)
                    .then((response) => {
                        this.img = response.data;
                    });
            },

            getMessages() {
                const url = 'dmGet';
                axios.get(url)
                    .then((response) => {
                        this.messages = response.data;
                    });
            },
            // scrollToEnd() {
            //     this.$nextTick(() => {
            //         window.scrollTo(0,document.body.scrollHeight);
            //     })
            // },

            scrollToEnd() {
                var bodyHeight = $('body').height();
                $('body').scrollTop(bodyHeight);
            },

            startProcessing: function () {
                this.processing = true;
            },
            endProcessing: function () {
                this.processing = false;
            },
            
    
            
        },

        mounted() {
            
            this.getMessages();
            this.imgGet();
            this.flgGet();
            Echo.channel('chat')
            .listen('MessageCreated', (event) => {
                // console.log("あ");
                this.getMessages(); // 全メッセージを再読込
                this.scrollToEnd();
            });
        },
        
        
        
        // mounted() {
        //     console.log('Component mounted.')
        // }
    }
</script>
