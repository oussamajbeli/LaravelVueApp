<template>
  <div>
    <div
      class="modal fade"
      id="editModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="editModalTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLongTitle">Edit task</h5>
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
                v-model="taskToEdit.name"
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
              type="submit"
              data-dismiss="modal"
              @click="update"
              class="btn btn-primary"
            >
              update
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["taskToEdit"],

  methods: {
    update() {
      axios
        .patch("http://127.0.0.1:8000/tasks/edit/" + this.taskToEdit.id, {
          name: this.taskToEdit.name,
        })
        .then((res) => this.$emit("updated", res))
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style>
</style>