<template>
	<div class="chatbox__message-holder">
		<div v-if="chat.from === 'user'" class="chatbox__message chatbox__message--user">
			{{ chat.message }}
		</div>
		
		<div v-else class="chatbox__message chatbox__message--reserved">
			{{ chat.message }}
		</div>

		<div v-if="chat.userImage" class="chatbox__message-avatar">
			<img :src="chat.userImage" title="" alt="">
		</div>
	</div>
</template>

<script>
    export default {
		props: ["chat"],
		name: 'message',
		computed: {
			
		},
        mounted() {

		}
    }
</script>

<style lang="scss">
	
</style>
