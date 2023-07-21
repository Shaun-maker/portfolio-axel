let editProjectModal = document.getElementById('js-project-modal');

export default() => ({
    openModal() {
        editProjectModal.showModal();
    },

    project: {
        tools: [],
    },

    async getProject(event) {
        let projectId = event.target.dataset.editProject;
        let res = await (await fetch(`/api/project/${projectId}`)).json();
        this.project = res.data;
        this.openModal();
    },
})