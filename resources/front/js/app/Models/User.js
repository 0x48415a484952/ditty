import Model from './Model';

export default class User extends Model {
    resourceName () {
        return 'users';
    }

    fields () {
        return [
            'name',
            'email',
            'password',
            'username',
            'avatar',
            'biography',
            'credentials',
            'social_urls',
        ];
    }
}
