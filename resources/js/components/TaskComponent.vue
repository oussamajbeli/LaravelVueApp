<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-header text-center">
            <h1>Tasks</h1>
          </div>
          <div class="card-body text-center">
            <add-task @task-added="refresh"></add-task>
          </div>
        </div>
      </div>

      <div class="container">
        <ul class="group-list d-block my-5">
          <div class="card">
            <div class="card-body">
              <li
                v-for="task in tasks.data"
                :key="task.id"
                class="
                  group-list-item
                  d-flex
                  justify-content-between
                  align-items-center
                  mt-3
                "
              >
                {{ task.name }}
                <div class="d-flex">
                  <button
                    type="button"
                    class="btn btn-secondary mr-3"
                    data-toggle="modal"
                    data-target="#editModal"
                    @click="getTask(task.id)"
                  >
                    edit
                  </button>
                  <button class="btn btn-danger" @click="deleteTask(task.id)">
                    delete
                  </button>
                </div>
              </li>
            </div>
          </div>
          <edit-task
            v-bind:taskToEdit="taskToEdit"
            @updated="refresh"
          ></edit-task>
        </ul>
      </div>
    </div>
    <pagination :data="tasks" @pagination-change-page="getResults" class="mt-5">
    </pagination>
  </div>
</template>

<script>
import EditTaskComponent from "./EditTaskComponent.vue";
export default {
  components: { EditTaskComponent },
  data() {
    return {
      tasks: {},
      taskToEdit: "",
    };
  },
  created() {
    axios
      .get("http://127.0.0.1:8000/tasksList")
      .then((res) => {
        this.tasks = res.data;
      })
      .catch((error) => {
        console.log(console.error);
      });
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/tasksList")
      .then((res) => {
        this.tasks = res.data;
      })
      .catch((error) => {
        console.log(console.error);
      });
    console.log("Tasks component mounted");
  },
  methods: {
    getResults(page = 1) {
      axios
        .get("http://127.0.0.1:8000/tasksList?page=" + page)
        .then((res) => {
          this.tasks = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    refresh(tasks) {
      this.tasks = tasks.data;
    },
    getTask(id) {
      axios
        .get("http://127.0.0.1:8000/tasks/edit/" + id)
        .then((res) => {
          console.log(res.data.name);
          this.taskToEdit = res.data;
        })
        .catch((error) => console.log(error));
    },
    deleteTask(id) {
      axios
        .delete("http://127.0.0.1:8000/tasks/" + id)
        .then((res) => {
          console.log(res.data);
          this.tasks = res.data;
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style>
</style>