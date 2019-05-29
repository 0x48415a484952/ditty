import Model from './Model';
import Tag from './Tag';

export default class Post extends Model {
    resourceName () {
        return 'posts';
    }

    fields () {
        return [
            'title',
            'subtitle',
            'body',
            'slug'
        ];
    }

    relationships () {
        return {
            tags: new Tag()
        };
    }
}
