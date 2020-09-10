var chat = new Vue({
    el: "#chat",
    data: {
        message: "",
        messages: [],
        user_id: location.pathname.match(/[^\/]+$/)[0],
        // ユーザーidの末尾をとってる
        self_user_info: null,
        partner_user_info: null,
        icon_image: {},
    },
    mounted: function () {
        this.getMessages();
        Echo.channel('chat')
        .listen('MessageCreated', (e) => {
            console.log(e)
            this.getMessages(); // 全メッセージを再読込

        });
    },
    methods: {
        getMessages: function () {
            axios
                .get('/ajax/chat', {
                    responseType: "json",
                    params: {
                        // ここにクエリパラメータを指定する
                        user_id: this.user_id,
                    },
                })
                .then((response) => { 
                    this.$set(this, "messages", response.data.messages)
                    this.$set(this, "self_user_info", response.data.self_user_info)
                    this.$set(this, "partner_user_info", response.data.partner_user_info)
                    this.$set(this.icon_image, this.self_user_info.id, this.self_user_info.icon_image)
                    this.$set(this.icon_image, this.partner_user_info.id, this.partner_user_info.icon_image)
                });
        },        
        send: function() {
            axios.post('/ajax/chat', {
                responseType: "json",
                params: {
                    // ここにクエリパラメータを指定する
                    post_user_info_id: this.self_user_info.id,
                    user_ids: [this.self_user_info.id, this.partner_user_info.id],
                    context: this.message,
                },
            })
                .then((response) => {
                    this.messages.push(response.data.message)
                    // 成功したらメッセージをクリア
                    this.message = '';

                });
        },
    },

})
