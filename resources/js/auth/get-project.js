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

        this.openModal();
    },

    async getTools() {
        let toolRes = await (await fetch(`/api/tools`)).json();
        this.tools = toolRes.data;
    },

    getTool(event) {
        let toolId = parseInt(event.target.dataset.toolId);

        let tool = this.tools.find(tool => tool.id === toolId);

        console.log(tool);
        
        this.project.tools.push(tool);
    }
})