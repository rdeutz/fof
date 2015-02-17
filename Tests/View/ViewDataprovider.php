<?php

class ViewDataprovider
{
    public function getTestGet()
    {
        $data[] = array(
            array(
                'mock' => array(
                    'viewProperty' => array(),
                    'defaultModel' => 'foobars',
                    'instances' => array(
                        'foobars' => new \FOF30\Tests\Stubs\Model\ModelStub(
                            new \FOF30\Tests\Helpers\TestContainer(array(
                                'componentName' => 'com_fakeapp'
                            ))
                        )
                    )
                ),
                'property' => 'foobar',
                'default'  => null,
                'model'    => null
            ),
            array(
                'case'   => 'Using default model, get<Property>() exists in the model',
                'result' => 'ok'
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'viewProperty' => array(),
                    'defaultModel' => 'foobars',
                    'instances' => array(
                        'foobars' => new \FOF30\Tests\Stubs\Model\ModelStub(
                            new \FOF30\Tests\Helpers\TestContainer(array(
                                'componentName' => 'com_fakeapp'
                            ))
                        )
                    )
                ),
                'property' => 'dummy',
                'default'  => null,
                'model'    => null
            ),
            array(
                'case'   => 'Using default model, <Property>() exists in the model',
                'result' => 'ok'
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'viewProperty' => array(),
                    'defaultModel' => 'foobars',
                    'instances' => array(
                        'foobars' => new \FOF30\Tests\Stubs\Model\ModelStub(
                            new \FOF30\Tests\Helpers\TestContainer(array(
                                'componentName' => 'com_fakeapp'
                            ))
                        )
                    )
                ),
                'property' => 'nothere',
                'default'  => 'default',
                'model'    => null
            ),
            array(
                'case'   => "Using default model, there isn't any method in the model",
                'result' => null
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'viewProperty' => array(),
                    'defaultModel' => 'dummy',
                    'instances' => array(
                        'foobars' => new \FOF30\Tests\Stubs\Model\ModelStub(
                            new \FOF30\Tests\Helpers\TestContainer(array(
                                'componentName' => 'com_fakeapp'
                            ))
                        )
                    )
                ),
                'property' => 'foobar',
                'default'  => null,
                'model'    => 'foobars'
            ),
            array(
                'case'   => 'Requesting for a specific model, get<Property>() exists in the model',
                'result' => 'ok'
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'viewProperty' => array(),
                    'defaultModel' => 'dummy',
                    'instances' => array(
                        'foobars' => new \FOF30\Tests\Stubs\Model\ModelStub(
                            new \FOF30\Tests\Helpers\TestContainer(array(
                                'componentName' => 'com_fakeapp'
                            ))
                        )
                    )
                ),
                'property' => 'dummy',
                'default'  => null,
                'model'    => 'foobars'
            ),
            array(
                'case'   => 'Requesting for a specific model, <Property>() exists in the model',
                'result' => 'ok'
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'viewProperty' => array(
                        'key'   => 'foobar',
                        'value' => 'test'
                    ),
                    'defaultModel' => 'foobars',
                    'instances' => array()
                ),
                'property' => 'foobar',
                'default'  => 'default',
                'model'    => null
            ),
            array(
                'case'   => 'Model not found, getting (existing) view property',
                'result' => 'test'
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'viewProperty' => array(),
                    'defaultModel' => 'foobars',
                    'instances' => array()
                ),
                'property' => 'foobar',
                'default'  => 'default',
                'model'    => null
            ),
            array(
                'case'   => 'Model not found, getting (non-existing) view property',
                'result' => 'default'
            )
        );

        return $data;
    }

    public static function getTestGetModel()
    {
        $data[] = array(
            array(
                'name' => 'foobar',
                'mock' => array(
                    'name' => null,
                    'defaultModel' => null,
                    'instances' => array(
                        'foobar' => 'test'
                    )
                )
            ),
            array(
                'case'   => 'Name passed',
                'result' => 'test',
                'exception' => false
            )
        );

        $data[] = array(
            array(
                'name' => null,
                'mock' => array(
                    'name' => 'foobar',
                    'defaultModel' => null,
                    'instances' => array(
                        'foobar' => 'test'
                    )
                )
            ),
            array(
                'case'   => 'Using the view name',
                'result' => 'test',
                'exception' => false
            )
        );

        $data[] = array(
            array(
                'name' => null,
                'mock' => array(
                    'name' => null,
                    'defaultModel' => 'foobar',
                    'instances' => array(
                        'foobar' => 'test'
                    )
                )
            ),
            array(
                'case'   => 'Using the default model name',
                'result' => 'test',
                'exception' => false
            )
        );

        $data[] = array(
            array(
                'name' => 'wrong',
                'mock' => array(
                    'name' => null,
                    'defaultModel' => null,
                    'instances' => array(
                        'foobar' => 'test'
                    )
                )
            ),
            array(
                'case'   => 'Model not found',
                'result' => '',
                'exception' => true
            )
        );

        return $data;
    }

    public static function getTestDisplay()
    {
        // No template, everything is going smooth
        $data[] = array(
            array(
                'mock' => array(
                    'doTask' => 'Foobar',
                    'before' => null,
                    'after'  => null,
                    'output' => 'test'
                ),
                'tpl' => null
            ),
            array(
                'case'      => 'No template, everything is going smooth',
                'output'    => 'test',
                'tpl'       => null,
                'exception' => false,
                'load'      => true,
                'before'    => array('counter' => 0),
                'after'     => array('counter' => 0),
            )
        );

        // With template, everything is going smooth
        $data[] = array(
            array(
                'mock' => array(
                    'doTask' => 'Foobar',
                    'before' => null,
                    'after'  => null,
                    'output' => 'test'
                ),
                'tpl' => 'test'
            ),
            array(
                'case'      => 'With template, everything is going smooth',
                'output'    => 'test',
                'tpl'       => 'test',
                'exception' => false,
                'load'      => true,
                'before'    => array('counter' => 0),
                'after'     => array('counter' => 0),
            )
        );

        // With template, before/after methods are correctly called
        $data[] = array(
            array(
                'mock' => array(
                    'doTask' => 'Dummy',
                    'before' => true,
                    'after'  => true,
                    'output' => 'test'
                ),
                'tpl' => 'test'
            ),
            array(
                'case'      => 'With template, before/after methods are correctly called',
                'output'    => 'test',
                'tpl'       => 'test',
                'exception' => false,
                'load'      => true,
                'before'    => array('counter' => 1),
                'after'     => array('counter' => 1),
            )
        );

        // No template, before returns false
        $data[] = array(
            array(
                'mock' => array(
                    'doTask' => 'Dummy',
                    'before' => false,
                    'after'  => true,
                    'output' => 'test'
                ),
                'tpl' => null
            ),
            array(
                'case'      => 'No template, before returns false',
                'output'    => null,
                'tpl'       => null,
                'exception' => 'FOF30\View\Exception\AccessForbidden',
                'load'      => false,
                'before'    => array('counter' => 1),
                'after'     => array('counter' => 0),
            )
        );

        // No template, after returns false
        $data[] = array(
            array(
                'mock' => array(
                    'doTask' => 'Dummy',
                    'before' => true,
                    'after'  => false,
                    'output' => 'test'
                ),
                'tpl' => null
            ),
            array(
                'case'      => 'No template, after returns false',
                'output'    => null,
                'tpl'       => null,
                'exception' => 'FOF30\View\Exception\AccessForbidden',
                'load'      => true,
                'before'    => array('counter' => 1),
                'after'     => array('counter' => 1),
            )
        );

        // No template, loadTemplate returns an exception
        $data[] = array(
            array(
                'mock' => array(
                    'doTask' => 'Foobar',
                    'before' => null,
                    'after'  => null,
                    'output' => new \Exception('', 500)
                ),
                'tpl' => null
            ),
            array(
                'case'      => 'No template, loadTemplate returns an exception',
                'output'    => null,
                'tpl'       => null,
                'exception' => '\Exception',
                'load'      => true,
                'before'    => array('counter' => 0),
                'after'     => array('counter' => 0),
            )
        );

        return $data;
    }

    public static function getTestLoadTemplate()
    {
        $data[] = array(
            array(
                'mock' => array(
                    'layout'     => 'foobar',
                    'any'        => array('test'),
                    'viewFinder' => array('first uri')
                ),
                'tpl'    => null,
                'strict' => false
            ),
            array(
                'case'   => 'No template, no strict, we immediatly have a result',
                'result' => 'test',
                'exception' => false
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'layout' => 'foobar',
                    'any'    => array('throw', 'throw', 'throw', 'throw', 'throw', 'throw'),
                    'viewFinder' => array('first uri', 'second uri')
                ),
                'tpl'    => null,
                'strict' => false
            ),
            array(
                'case'   => 'No template, no strict, we immediatly throw an exception',
                'result' => new \Exception(),
                'exception' => true
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'layout' => 'foobar',
                    'any'    => array(new \Exception(), new \Exception(), new \Exception(), new \Exception(), new \Exception(), new \Exception()),
                    'viewFinder' => array('first uri', 'second uri')
                ),
                'tpl'    => null,
                'strict' => false
            ),
            array(
                'case'   => 'No template, no strict, we immediatly return an exception',
                'result' => '',
                'exception' => true
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'layout' => 'foobar',
                    'any'    => array('throw', 'test'),
                    'viewFinder' => array('first uri', 'second uri')
                ),
                'tpl'    => null,
                'strict' => false
            ),
            array(
                'case'   => 'No template, no strict, we have a result after throwing some exceptions',
                'result' => 'test',
                'exception' => false
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'layout' => 'foobar',
                    'any'    => array(new \Exception(), 'test'),
                    'viewFinder' => array('first uri', 'second uri')
                ),
                'tpl'    => null,
                'strict' => true
            ),
            array(
                'case'   => 'No template, no strict, loadAny returns an exception',
                'result' => 'test',
                'exception' => true
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'layout' => 'foobar',
                    'any'    => array('test'),
                    'viewFinder' => array('first uri')
                ),
                'tpl'    => 'dummy',
                'strict' => false
            ),
            array(
                'case'   => 'With template, no strict, we immediatly have a result',
                'result' => 'test',
                'exception' => false
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'layout' => 'foobar',
                    'any'    => array('test'),
                    'viewFinder' => array('first uri')
                ),
                'tpl'    => 'dummy',
                'strict' => true
            ),
            array(
                'case'   => 'With template and strict, we immediatly have a result',
                'result' => 'test',
                'exception' => false
            )
        );

        return $data;
    }

    public static function getTestSetLayout()
    {
        $data[] = array(
            array(
                'mock' => array(
                    'layout' => null
                ),
                'layout' => 'foobar'
            ),
            array(
                'case'   => 'Internal layout is null, passing simple layout',
                'result' => null,
                'layout' => 'foobar',
                'tmpl'   => '_'
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'layout' => 'previous'
                ),
                'layout' => 'foobar'
            ),
            array(
                'case'   => 'Internal layout is set, passing simple layout',
                'result' => 'previous',
                'layout' => 'foobar',
                'tmpl'   => '_'
            )
        );

        $data[] = array(
            array(
                'mock' => array(
                    'layout' => null
                ),
                'layout' => 'foo:bar'
            ),
            array(
                'case'   => 'Internal layout is null, passing layout + template',
                'result' => null,
                'layout' => 'bar',
                'tmpl'   => 'foo'
            )
        );

        return $data;
    }
}