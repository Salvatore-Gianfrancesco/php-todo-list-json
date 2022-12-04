const { createApp } = Vue;

createApp({
    data() {
        return {
            tasks: [],
            newTask: ''
        }
    },
    methods: {
        readTasks(url) {
            axios.get(url)
                .then(response => {
                    // console.log(response);
                    this.tasks = response.data;
                })
                .catch(err => {
                    console.log(err.message);
                })
        },
        saveTask() {
            // console.log('Saving new task...', this.newTask);

            const data = {
                task: this.newTask
            }

            axios
                .post('functions/save_task.php', data, { headers: { 'Content-Type': 'multipart/form-data' } })
                .then(response => {
                    // console.log(response);
                    this.tasks = response.data;
                    this.newTask = '';
                })
                .catch(err => {
                    console.error(err.message);
                })
        },
        deleteTask(index) {
            // console.log('Deleting task...', index);

            const data = {
                task_index: index
            }

            axios.post('functions/delete_task.php', data, { headers: { 'Content-Type': 'multipart/form-data' } })
                .then(response => {
                    // console.log(response);
                    this.tasks = response.data;
                })
                .catch(err => {
                    console.log(err.message);
                })
        },
        markTask(index) {
            // console.log('Marking task...', index);

            const data = {
                task_index: index
            }

            axios.post('functions/mark_task.php', data, { headers: { 'Content-Type': 'multipart/form-data' } })
                .then(response => {
                    // console.log(response);
                    this.tasks = response.data;
                })
                .catch(err => {
                    console.log(err.message);
                })
        }
    },
    mounted() {
        this.readTasks('functions/read_tasks.php');
    }
}).mount('#app');