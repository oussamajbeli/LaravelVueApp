<template>
  <div>
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModalCenter"
    >
      new task
    </button>

    <!-- Modal -->
    <div
      class="modal fade my-3"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add task</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <label for="name">Task name: </label>
              <textarea
                v-model="name"
                name="name"
                id="name"
                rows="4"
                class="form-control"
              ></textarea>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button
              data-dismiss="modal"
              type="submit"
              @click="storeTask"
              class="btn btn-success"
            >
              save
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
    };
  },
  methods: {
    storeTask() {
      axios
        .post("http://127.0.0.1:8000/tasksList", {
          name: this.name,
        })
        .then((res) => this.$emit("task-added", res))
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style>
</style>