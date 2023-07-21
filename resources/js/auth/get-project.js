let editProjectModal = document.getElementById('js-project-modal');

export default() => ({
    openModal() {
        editProjectModal.showModal();
    },

    project: {
        tools: [],
    },

    tools: {},

    async getProject(event) {
        let projectId = event.target.dataset.editProject;

        let projectRes = await (await fetch(`/api/project/${projectId}`)).json();
        this.project = projectRes.data;

        let toolRes = await (await fetch(`/api/tools`)).json();
        this.tools = toolRes.data;
        console.log(toolRes);
        this.openModal();
    },
})