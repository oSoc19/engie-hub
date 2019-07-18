<template>
    <div class="col-md-2 goal-tickets">
        <img src="../../img/icons/noun_Game_1967460.svg" class="goal-icons"/>
        <h4>GOAL</h4>
        <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
    </div>
</template>

<script>
export default {
    name: 'GoalTicket'
    data() {
        goals: []
    }

    methods: {
        axios.get('/api/getgoals')
        .then(response => {
            this.goals = response.data
        })
        .catch(e => {
            this.errors.push(e);
        })
    }
}
</script>

<css>

</css>
