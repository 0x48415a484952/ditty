import Model from './Model';

export default class Post extends Model {
    resourceName () {
        return 'categories';
    }

    fields () {
        return [
            'title',
            'parent_id'
        ];
    }
}
