let editProjectModal = document.getElementById('js-project-modal');

export default() => ({
    openModal() {
        editProjectModal.showModal();
    },

    project: {},

    async getProject(event) {
        let id = event.target.dataset.editProject;
        let res = await (await fetch(`/api/project/${id}`)).json();
        this.project = res.data;
        this.openModal();
    },
})