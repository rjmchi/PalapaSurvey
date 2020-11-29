<template>
	<div>
        <h1>Surveys</h1>
		<p v-for="survey in surveys" v-bind:key="survey.id">
			<span>{{survey.question}}</span>
			<span>{{survey.status}}</span>
			<button v-if="survey.status=='unsent'" v-on:click="sendSurvey(survey.id)">Send</button>
			<button v-else-if="survey.status=='Sent'" v-on:click="closeSurvey(survey.id)">Close</button>
			<button v-else v-on:click="viewSurvey(survey.id)">View</button>
			<button v-on:click="deleteSurvey(survey.id)">Delete</button>
		</p>

	</div>
</template>

<script>

	export default {
		data () {
			return {
				surveys:[],
			}
		},
		methods: {
			fetchSurveys: async function() {
                try {
                    let resp = await fetch('/api/survey' , {method: "GET", });
                    console.log(resp.status);
                    if (resp.ok) {
                        resp = await resp.json();
                        this.surveys = resp.data;
                    }
                } catch (err) {
                    console.log(err);
                }
			},
			sendSurvey: async function(id) {
				try {
                    let ret = await fetch('/mail' , {method: "GET", });
					console.log(ret);
                    let resp = await fetch('/api/survey/'+id , {
						method: "PUT", 
						body:JSON.stringify({'status':'Sent'}),
						headers: {
							'content-type': 'application/json'
						}
					});
                    console.log(resp.status);
                    if (resp.ok) {
                        resp = await resp.json();
						this.fetchSurveys();
                    }
                } catch (err) {
                    console.log(err);
                }
			},
			closeSurvey: async function(id) {
				try {
                    let resp = await fetch('/api/survey/'+id , {
						method: "PUT", 
						body:JSON.stringify({'status':'Closed'}),
						headers: {
							'content-type': 'application/json'
						}
					});
                    console.log(resp.status);
                    if (resp.ok) {
                        resp = await resp.json();
						this.fetchSurveys();
                    }
                } catch (err) {
                    console.log(err);
				}
			},
			deleteSurvey: async function(id) {
				try {
                    let resp = await fetch('/api/survey/'+id , {
						method: "DELETE", 
					});
                    console.log(resp.status);
                    if (resp.ok) {
                        resp = await resp.json();
						this.fetchSurveys();
                    }
                } catch (err) {
                    console.log(err);
				}
			},			
		},			
		created() {
			this.fetchSurveys();
		},
	}
</script>

<style lang="scss" scoped>

</style>