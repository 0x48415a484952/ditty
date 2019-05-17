import Model from './Model';

export default class Comment extends Model {
    resourceName () {
        return 'comments';
    }

    fields () {
        return [
            'post_id',
            'parent_id',
            'name',
            'email',
            'text',
            'status'
        ];
    }
}
