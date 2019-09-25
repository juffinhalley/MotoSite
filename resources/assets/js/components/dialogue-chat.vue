<template>
    <div class="widget">
        <div class="grid _pr-md _pl-md _pt-sm _pb-sm _gborder-bottom">
			<div class="gcell gcell--2 _flex _items-center">
				<a href='/' class="icon icon--ms icon--grey">
                    <svg>
                        <use xlink:href="./svg/sprite.svg#arrowLeft"></use>
                    </svg>
				</a>
			</div>

			<div class="gcell gcell--auto _ml-auto _mr-auto _flex _items-center">
				<a href='#' class="title title--dark title--ms title--light _tdn">
					Никита Шевченко
				</a>
			</div>

			<div class="gcell gcell--3 _flex _items-center _justify-end">
				<div class="modal-menu _mr-def">
					<span class="modal-menu__icon">
                        <svg>
                            <use xlink:href="./svg/sprite.svg#dots"></use>
                        </svg>
					</span>
				</div>

				<span class="text text--def text--grey">
					online
				</span>
			</div>
		</div>

		<div class="dialogue__chat">
			<div class="chatbox">

			</div>
		</div>

		<div class="grid _pt-ms _pb-ms">
			<div class="gcell gcell--1"></div>
			
			<div class="gcell gcell--8">
				<input v-model="message" @keyup.enter="send" type="text" class="chatbox-input" placeholder="Напишите ваше сообщение здесь...">
			</div>

			<div class="gcell gcell--3"></div>
		</div>
    </div>
</template>

<script>
    export default {
        mounted() {

		},

		data () {
			return {
				message: ""
			}
		},
		
		methods: {
			send () {
				if (this.message.length) {
					console.log(this.message);
				}
			}
		}
    }
</script>

<style lang="scss" scoped>
	.chatbox-input {
		border: 1px solid #f8f8f8;
		font-size: 14px;
		color: #757575;
		letter-spacing: 0.05em;
		font-weight: 300;
		padding: 12px;
		height: 40px;
		outline: none;
		width: 100%;

		&:focus {
			border-color: #d5d5d5;
		}

		&:hover {
			border-color: #d5d5d5;
		}
	}
</style>
