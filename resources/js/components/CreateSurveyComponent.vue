<template>
	<div>
        <h1>Create Survey</h1>
        <form @submit.prevent="createSurvey">
            <textarea class="form-control" v-model="question"></textarea>
            <button class="btn btn-primary">Submit</button>
        </form>
        <a href="/">Back</a>
	</div>
</template>

<script>

	export default {
		data () {
			return {
                question: '',
			}
		},
		methods: {
            createSurvey: async function() {
                try {
                    let resp = await fetch('/api/survey' , 
                    {
                        method: "POST", 
                        body: JSON.stringify({'question': this.question}),
                        headers: {'content-type': 'application/json'} 
                    });
                    console.log(resp.status);
                    if (resp.ok) {
                        resp = await resp.json();
                        this.unit = resp.data;
                        this.question = '';
                    }
                } catch (err) {
                    console.log(err);
                }
            },
		},
		created() {
		},
	}
</script>

<style lang="scss" scoped>

</style>