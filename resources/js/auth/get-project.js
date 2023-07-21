let editProjectModal = document.getElementById('js-project-modal');

export default() => ({
    openModal() {
        editProjectModal.showModal();
    },

    project: {
        tools: [],
    },

    allTools: {},

    filteredTools: {},

    async getProject(event) {
        let projectId = event.target.dataset.editProject;

        let projectRes = await (await fetch(`/api/project/${projectId}`)).json();
        this.project = projectRes.data;

        this.filterTool();

        this.openModal();
    },

    async getTools() {
        let toolRes = await (await fetch(`/api/tools`)).json();
        this.allTools = toolRes.data;

        this.filteredTools = toolRes.data;
    },

    filterTool() {
        this.filteredTools = this.allTools.filter(tool => {
            return !this.project.tools.find(projectTool => projectTool.id === tool.id)
        });
    },

    getTool(event) {
        let toolId = parseInt(event.target.dataset.toolId);
        let tool = this.allTools.find(tool => tool.id === toolId);
        
        console.log(this.project.tools.length);
        if (this.project.tools.length < 6) {
            this.project.tools.push(tool);
            this.filterTool();
        }
    },

    emptyTool(index) {
        this.project.tools.splice(index, 1); 
        this.filterTool();
    }
})