<template>
    <div class="row justify-content-center">
        <div v-for="goal in goals" class="col-md-2 goal-tickets">
            <img :src="goal.emblem_path" class="goal-icons"/>
            <h4>{{goal.name}}</h4>
            <p>{{goal.description}}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'GoalTicket',
    data() {
        return {
            goals: []
        }
    },
    created() {
        this.getGoals();
    },

    methods: {
        getGoals: function(){
            axios.get('/api/goals')
            .then(response => {
                this.goals = response.data.data;
                console.log(response.data.data);
            })
            .catch(e => {
                this.errors.push(e);
            })
        }
    }
}
</script>

<css>

</css>
