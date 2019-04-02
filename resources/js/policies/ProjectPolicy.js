export default class ProjectPolicy
{
	static create(user) {
		return user.is_admin == true
	}

	static view(user, project) {
		return true;
	}

	static delete(user, project) {
		return user.is_admin
		? project.folder_id === user.folder_id
		: user.uuid === project.user_id
	}

	static update(user, project) {
		return user.is_admin
		? project.folder_id === user.folder_id
		: user.uuid === project.user_id
	}
}