<template>
	<div>
        <h1>Owner Survey Answer</h1>
        <p>Unit: {{unit_id}} &mdash; {{unit.owner}}</p>
        <h2>{{survey.question}}</h2>

        <p><input type="radio"> Yes</p>
        <p><input type="radio"> No</p>

	</div>
</template>

<script>

	export default {
        props: ['unit_id', 'answer_id'],
		data () {
			return {
                url: '/api/',
                unit: {},
                survey: {},
                answer: {},
			}
		},
		methods: {
            fetchUnit: async function(id){
                try {
                    let resp = await fetch(this.url+'unit/'+id , { method: "GET" });
                    console.log(resp.status);
                    if (resp.ok) {
                        resp = await resp.json();
                        this.unit = resp.data;
                    }
                } catch (err) {
                    console.log(err);
                }            
            },
            fetchAnswer: async function(id){
                try {
                    let resp = await fetch(this.url+'answer/'+id, { method: "GET" });
                    console.log(resp.status);
                    if (resp.ok) {
                        resp = await resp.json();
                        this.answer = resp.data;
                        this.fetchSurvey(this.answer.survey_id);
                    }
                } catch (err) {
                    console.log(err);
                }            
            },
            fetchSurvey: async function(id){
                try {
                    let resp = await fetch(this.url+'survey/'+id , { method: "GET" });
                    console.log(resp.status);
                    if (resp.ok) {
                        resp = await resp.json();
                        this.survey = resp.data;
                    }
                } catch (err) {
                    console.log(err);
                }            
            },        
		},
		created() {
            this.fetchUnit(this.unit_id);
            this.fetchAnswer(this.answer_id);
		},
	}
</script>

<style lang="scss" scoped>

</style>