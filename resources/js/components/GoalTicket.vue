<template>
    <div class="row justify-content-center">
        <div v-for="goal in goals" class=" goal-tickets" v-bind:id="goal.id">
            <img :src="goal.emblem_path" class="goal-icons"  v-bind:style= "[(goal.id-1) >= current ? {backgroundColor: defaultColor } : {backgroundColor:  goal.emblem_color }]" />
        </div>
    </div>
</template>

<script>
export default {
    name: 'GoalTicket',
    props: ['current'],
    data() {
        return {
            goals: [],
            defaultColor: '#E0E0E0'
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
            })
        }
    }
}
</script>

<style>
.goal-icons {
    fill: white;
    box-shadow: 0px 0px 15px #a3a3a3;
    background-color: #E0E0E0;
}
.goal-tickets {
    width: 14%;
}

</style>
